import Dropdown from '@vendor/plugin/dropdown';

try {
    const CONFIG = {
        inputClass: 'input',
        optionClass: 'font-xs text-bayoux text-right',
        dropdownClass: 'w-full unselected',
        onSelected( dropdown ) {
            dropdown.classList.remove('unselected')
        }
    };

    const FILTER_CONFIG = Object.assign({}, CONFIG, {
        hasFilterItem: true,
        filterPlaceholder: 'جستجو...',
        filterClass: 'font-xs text-bayoux',
        inputClass: 'input input--blue border border-solid rounded',
    });

    document.querySelector('.dnt-page__select--day').MountDropdown( CONFIG );
    document.querySelector('.dnt-page__select--month').MountDropdown( CONFIG );
    document.querySelector('.dnt-page__select--year').MountDropdown( CONFIG );
    document.querySelector('.dnt-page__select--birth').MountDropdown( FILTER_CONFIG );
    document.querySelector('.dnt-page__select--city').MountDropdown( FILTER_CONFIG );
} catch (e) {}