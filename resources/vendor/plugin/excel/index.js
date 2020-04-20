import {
    ZeroPad
} from "@vendor/plugin/helper";

const ERROR_MESSAGE = 'متاسفانه مرورگر شما از این قابلیت پشتیبانی نمی‌کند.';

const exportExcel = async (tableDom, filename = 'Report') => {
    try {
        if ( !tableDom ) return;
        new Promise(resolve => {
            const URL = 'data:application/vnd.ms-excel;base64,';
            const TEMPLATE = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40" lang="fa"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>';
            const base64 = s => window.btoa(unescape(encodeURIComponent(s)));
            const format = (s, c) => s.replace(/{(\w+)}/g, (_, p) => c[p]);
            const CTX = {
                worksheet: 'Report - Ehda Center',
                table: tableDom.innerHTML
            };
            const DATE = new Date();
            const DOWNLOAD_LINK = document.createElement("a");
            DOWNLOAD_LINK.download = `${filename}-${DATE.getFullYear()}-${ZeroPad(DATE.getMonth() + 1)}-${ZeroPad(DATE.getDate())}T${ZeroPad(DATE.getHours())}:${ZeroPad(DATE.getMinutes())}.xls`;
            DOWNLOAD_LINK.href = URL + base64(format(TEMPLATE, CTX));
            DOWNLOAD_LINK.click();
            resolve();
        }).catch(exception => exception);
    } catch ( exception ) {
        console.warn('exception: ', exception);
        throw ERROR_MESSAGE;
    }
};

export default exportExcel;