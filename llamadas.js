
//llamada al reporte
function getCombo(selectObject){
    var value = selectObject.value;
    console.log(value);
    
    if(value == 'Balance'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteBalanceSheetStandard.php");
    }if(value == 'Profit'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteProfitAndLosStandard.php");
    }if(value == 'Bloque_a'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteEstimateVsActual_Aranda_A.php");
    }if(value == 'Bloque_b'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteEstimateVsActual_Aranda_B.php");
    }if(value == 'Bloque_c'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteEstimateVsActual_Aranda_C.php");
    }if(value == 'Bloque_d'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteEstimateVsActual_Aranda_D.php");
    }if(value == 'Bloque_e'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteEstimateVsActual_Aranda_E.php");
    }if(value == 'Bloque_f'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteEstimateVsActual_Aranda_F.php");
    }if(value == 'Bloque_f1'){
        console.log("VALOR INGRESADO!!"+value);
        window.open("./reporteEstimateVsActual_Aranda_F1.php");
    }

}