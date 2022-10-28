//! moment.js locale configuration

(function (global, factory) {
   typeof exports === 'object' && typeof module !== 'undefined'
       && typeof require === 'function' ? factory(require('../moment')) :
   typeof define === 'function' && define.amd ? define(['../moment'], factory) :
   factory(global.moment)
}(this, (function (moment) { 'use strict';


    var ptBr = moment.defineLocale('pt-br', {
        months : 'Janeiro_Fevereiro_Mar�o_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro'.split('_'),
        monthsShort : 'Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez'.split('_'),
        weekdays : 'Domingo_Segunda-feira_Ter�a-feira_Quarta-feira_Quinta-feira_Sexta-feira_S�bado'.split('_'),
        weekdaysShort : 'Dom_Seg_Ter_Qua_Qui_Sex_S�b'.split('_'),
        weekdaysMin : 'D_S_T_Q_Q_S_S'.split('_'),
        weekdaysParseExact : true,
        longDateFormat : {
            LT : 'HH:mm',
            LTS : 'HH:mm:ss',
            L : 'DD/MM/YYYY',
            LL : 'D [de] MMMM [de] YYYY',
            LLL : 'D [de] MMMM [de] YYYY [�s] HH:mm',
            LLLL : 'dddd, D [de] MMMM [de] YYYY [�s] HH:mm'
        },
        calendar : {
            sameDay: '[Hoje �s] LT',
            nextDay: '[Amanh� �s] LT',
            nextWeek: 'dddd [�s] LT',
            lastDay: '[Ontem �s] LT',
            lastWeek: function () {
                return (this.day() === 0 || this.day() === 6) ?
                    '[�ltimo] dddd [�s] LT' : // Saturday + Sunday
                    '[�ltima] dddd [�s] LT'; // Monday - Friday
            },
            sameElse: 'L'
        },
        relativeTime : {
            future : 'em %s',
            past : 'h� %s',
            s : 'poucos segundos',
            ss : '%d segundos',
            m : 'um minuto',
            mm : '%d minutos',
            h : 'uma hora',
            hh : '%d horas',
            d : 'um dia',
            dd : '%d dias',
            M : 'um m�s',
            MM : '%d meses',
            y : 'um ano',
            yy : '%d anos'
        },
        dayOfMonthOrdinalParse: /\d{1,2}�/,
        ordinal : '%d�'
    });

    return ptBr;

})));