<?php

namespace App\Console\Commands;

use Domains\Location\Repositories\CityRepository;
use Domains\Location\Services\CityServices;
use Domains\Location\Services\Contracts\DTOs\CityDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;
use Domains\User\Services\UserService;
use Illuminate\Console\Command;
use Morilog\Jalali\Jalalian;

class oldLegate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:oldLegate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add old legate';

    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var CityServices
     */
    private $cityService;


    public function __construct(UserService $userService,CityServices $cityService)
    {
        $this->userService = $userService;
        $this->cityService = $cityService;
        parent::__construct();

    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::table('users_excel4')->where('id', '>', 0)->chunkById(1, function ($users) {
            foreach ($users as $userExcel) {
                $city = $this->getCurrentCity($userExcel->city);

                try {
                    $userRegisterDTO = new UserRegisterInfoDTO();
                    $mobile = $this->checkMobile($userExcel->mobile);

                    $userRegisterDTO
                        ->setNationalCode($this->passes($userExcel->national_code))
                        ->setName($userExcel->name)
                        ->setMaritalStatus($userExcel->marital_status)
                        ->setCurrentAddress($userExcel->address)
                        ->setLastName($userExcel->last_name)
                        ->setFatherName($userExcel->father_name)
                        ->setIdentityNumber($userExcel->identity_number)
                        ->setDateOfBirth($this->convertDate($userExcel->date_of_birth))
                        ->setMobile($mobile)
                        ->setCurrentCityId($city->getId())
                        ->setCurrentProvinceId($city->getProvince()->getId())
                        ->setEmail($userExcel->email)
                        ->setPassword($mobile)
                        ->setLastEducationDegree($userExcel->last_education_degree)
                        ->setPhone($userExcel->phone)
                        ->setCreated($this->convertDate($userExcel->created_at))
                        ->setRoleType(config('user.legate_role_type'))
                        ->setRoleStatus(config('user.user_role_pending_status'))
                        ->setRegisterType(config('user.user_register_type.old_site'));
                    echo($userExcel->national_code . ':' . $userExcel->id . '  - ');
                    return $this->userService->register($userRegisterDTO);
                } catch (\Exception $exception) {
                    file_put_contents('file.txt', $exception->getMessage() . ',' . $userExcel->national_code . ",\n",
                        FILE_APPEND);
                }

            }
        });
    }

    private function checkMobile($mobile)
    {
        if ($mobile && strlen($mobile) == 10) {
            return '0' . $mobile;
        }
        if ($mobile && strlen($mobile) == 11) {
            return $mobile;
        }
        if ($mobile && strlen($mobile) == 12) {
            $mobile = '0' . substr($mobile, 2);
            return $mobile;
        }
        throw new \Exception($mobile . ' -mobile- ');
    }

    public function passes($code)
    {
        if (strlen($code) < 10) {
            $h = 10 - strlen($code);
            $s = 0;
            for ($i = 1; $i < $h; $i++) {
                $s = $s . '0';
            }
            $code = $s . $code;

        }
        if (strlen($code) == 10) {
            if (!preg_match('/^[0-9]{10}$/', $code)) {
                throw new \Exception($code);
            }
            for ($i = 0; $i < 10; $i++) {
                if (preg_match('/^' . $i . '{10}$/', $code)) {
                    throw new \Exception($code);
                }
            }
            for ($i = 0, $sum = 0; $i < 9; $i++) {
                $sum += ((10 - $i) * intval(substr($code, $i, 1)));
            }
            $ret = $sum % 11;
            $parity = intval(substr($code, 9, 1));
            if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity)) {
                return $code;
            }
            return $code;
        } elseif (strlen($code) == 12 || strlen($code) == 16) {
            return $code;
        }
        throw new \Exception($code);
    }

    private function convertDate(string $date)
    {
        $date = explode('/', $date);
        $year = '13' . $date[0];
        $month = $date[1];
        $day = $date[2];
        return (new Jalalian($year, $month, $day))->toCarbon()->toDateString();
    }

    private function getCurrentCity($city)
    {
        $city = array_values($this->cityService->findByName($city));
        if($city){
            return $city[0];
        }
        return array_values($this->cityService->findByName('تهران'))[0];

    }

}
