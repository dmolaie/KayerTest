/*!*******************************************************************************!*\
  !*** toJalaali && toGregorian source: https://github.com/jalaali/jalaali-js ***!
  \*****************************************************************************/

import {
    ZeroPad
} from "@vendor/plugin/helper";

const breaks =  [
    -61, 9, 38, 199, 426, 686, 756, 818, 1111, 1181, 1210,
    1635, 2060, 2097, 2192, 2262, 2324, 2394, 2456, 3178
];

const MONTH = [
    '',
    'فروردین',
    'اردیبهشت',
    'خرداد',
    'تیر',
    'مرداد',
    'شهریور',
    'مهر',
    'آبان',
    'آذر',
    'دی',
    'بهمن',
    'اسفند',
];

const PERIODS = {
    ['month']: 30 * 24 * 60 * 60 * 1000,
    ['week']: 7 * 24 * 60 * 60 * 1000,
    ['day']: 24 * 60 * 60 * 1000,
    ['hour']: 60 * 60 * 1000,
    ['minute']: 60 * 1000
};

export default class DateService {
    static toJalaali(gy = 0, gm = 0, gd = 0) {
        if (Object.prototype.toString.call(gy) === '[object Date]') {
            gd = gy.getDate();
            gm = gy.getMonth() + 1;
            gy = gy.getFullYear();
        }
        return DateService.d2j( DateService.g2d( gy, gm, gd ) )
    }

    static toGregorian( jy = 0, jm = 0, jd = 0 ) {
        return DateService.d2g( DateService.j2d( jy, jm, jd ) );
    }

    static timeSince( timestamp ) {
        const DIFF = Date.now() - timestamp;
        if (DIFF > PERIODS['month'])
            return Math.floor(DIFF / PERIODS['month']) + ' ماه پیش';
        if (DIFF > PERIODS['week'])
            return Math.floor(DIFF / PERIODS['week']) + ' هفته پیش';
        if (DIFF > PERIODS['day'])
            return Math.floor(DIFF / PERIODS['day']) + ' روز پیش';
        if (DIFF > PERIODS['hour'])
            return Math.floor(DIFF / PERIODS['hour']) + ' ساعت پیش';
        if (DIFF > PERIODS['hour'])
            return Math.floor(DIFF / PERIODS['hour']) + ' ساعت پیش';
        if (DIFF > PERIODS['minute'])
            return Math.floor(DIFF / PERIODS['minute']) + ' دقیقه پیش';
        return 'همین الان';
    }

    static getLocalString( timestamp, locales = 'fa-IR' ) {
        try {
            const OPTIONS = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false };
            return new Date(parseInt( timestamp ) * 1e3).toLocaleDateString(locales, OPTIONS);
        } catch (e) {
            const TIME_STAMP = (parseInt( timestamp ) * 1e3);
            const DATE = new Date( TIME_STAMP );
            let day   = DATE.getDate(),
                month = DATE.getMonth(),
                year  = DATE.getFullYear();
            const JALAALI = DateService.toJalaali(year, (month + 1), day);
            return `${JALAALI.jd} ${MONTH[JALAALI.jm]} ${JALAALI.jy}`
        }
    }

    static getJalaaliDate( timestamp ) {
        try {
            const OPTIONS = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(parseInt( timestamp ) * 1e3).toLocaleDateString('fa-IR', OPTIONS);
        } catch (e) {
            const TIME_STAMP = (parseInt( timestamp ) * 1e3);
            const DATE = new Date( TIME_STAMP );
            let day   = DATE.getDate(),
                month = DATE.getMonth(),
                year  = DATE.getFullYear();
            const JALAALI = DateService.toJalaali(year, (month + 1), day);
            return `${JALAALI.jd} ${MONTH[JALAALI.jm]} ${JALAALI.jy}`
        }
    }

    static jalaaliToTimestamp(jy = 0, jm = 0, jd = 0) {

        let {
            gy: year,
            gm: month,
            gd: day
        } = DateService.toGregorian( jy, jm, jd );

        return (
            Date.parse(`${year}-${ZeroPad(month)}-${ZeroPad(day)}T12:00:00`) / 1e3
        )
    }

    static getJalaaliMonthIndex( month ) {
        return (
            [
                '',
                'فروردین',
                'اردیبهشت',
                'خرداد',
                'تیر',
                'مرداد',
                'شهریور',
                'مهر',
                'آبان',
                'آذر',
                'دی',
                'بهمن',
                'اسفند',
            ].indexOf( month )
        )
    }

    static g2d(gy, gm, gd) {
        let d = DateService.div((gy + DateService.div(gm - 8, 6) + 100100) * 1461, 4)
            + DateService.div(153 * DateService.mod(gm + 9, 12) + 2, 5)
            + gd - 34840408;
        d = d - DateService.div(DateService.div(gy + 100100 + DateService.div(gm - 8, 6), 100) * 3, 4) + 752;
        return d
    }

    static d2j(jdn) {
        let gy = DateService.d2g(jdn).gy
            , jy = gy - 621
            , r = DateService.jalCal(jy, false)
            , jdn1f = DateService.g2d(gy, 3, r.march)
            , jd
            , jm
            , k;

        k = jdn - jdn1f;

        if (k >= 0) {
            if (k <= 185) {
                jm = 1 + DateService.div(k, 31);
                jd = DateService.mod(k, 31) + 1;
                return  {
                    jy: jy,
                    jm: jm,
                    jd: jd
                }
            } else {
                k -= 186
            }
        } else {
            jy -= 1;
            k += 179;
            if (r.leap === 1)
                k += 1
        }

        jm = 7 + DateService.div(k, 30);
        jd = DateService.mod(k, 30) + 1;

        return  {
            jy: jy,
            jm: jm,
            jd: jd
        }
    }

    static j2d(jy, jm, jd) {
        let r = DateService.jalCal(jy, true);
        return (
            DateService.g2d(r.gy, 3, r.march) + (jm - 1) * 31 - DateService.div(jm, 7) * (jm - 7) + jd - 1
        )
    }

    static jalCal(jy, withoutLeap) {
        let bl = breaks.length
            , gy = jy + 621
            , leapJ = -14
            , jp = breaks[0]
            , jm
            , jump
            , leap
            , leapG
            , march
            , n
            , i;

        if (jy < jp || jy >= breaks[bl - 1])
            throw new Error('Invalid Jalaali year ' + jy);

        for (i = 1; i < bl; i += 1) {
            jm = breaks[i];
            jump = jm - jp;
            if (jy < jm) break;
            leapJ = leapJ + DateService.div(jump, 33) * 8 + DateService.div(DateService.mod(jump, 33), 4);
            jp = jm
        }
        n = jy - jp;

        leapJ = leapJ + DateService.div(n, 33) * 8 + DateService.div(DateService.mod(n, 33) + 3, 4);
        if (DateService.mod(jump, 33) === 4 && jump - n === 4)
            leapJ += 1;

        leapG = DateService.div(gy, 4) - DateService.div((DateService.div(gy, 100) + 1) * 3, 4) - 150;

        march = 20 + leapJ - leapG;

        if (withoutLeap) return { gy: gy, march: march };

        if (jump - n < 6)
            n = n - jump + DateService.div(jump + 4, 33) * 33;

        leap = DateService.mod(DateService.mod(n + 1, 33) - 1, 4);
        if (leap === -1) {
            leap = 4
        }

        return  { leap: leap
            , gy: gy
            , march: march
        }
    }

    static d2g( jdn ) {
        let j
            , i
            , gd
            , gm
            , gy;

        j = 4 * jdn + 139361631;
        j = j + DateService.div(DateService.div(4 * jdn + 183187720, 146097) * 3, 4) * 4 - 3908;
        i = DateService.div(DateService.mod(j, 1461), 4) * 5 + 308;
        gd = DateService.div(DateService.mod(i, 153), 5) + 1;
        gm = DateService.mod(DateService.div(i, 153), 12) + 1;
        gy = DateService.div(j, 1461) - 100100 + DateService.div(8 - gm, 6);

        return  {
            gy: gy,
            gm: gm,
            gd: gd
        }
    }

    static div(a, b) {
        return ~~(a / b)
    }

    static mod(a, b) {
        return a - ~~(a / b) * b
    }
}
