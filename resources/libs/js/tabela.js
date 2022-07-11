let tabelaRepo = ""

window.addEventListener("load", function(event) {
    if(tabelaRepo != ""){
        tabelaRepo
            .clear()
            .draw();
            tabelaRepo.destroy();
    }

    tabelaRepo = $('#tblRepo').DataTable({
        "responsive": true,
        "info": false,
        "paging": true,
        "autoWidth": false,
        "searching": true,
        // "columnDefs": [
        //     {"visible": false, "targets": 4}
        // ]
    });
 
    // // #myInput is a <input type="text"> element
    $('#chkArquivado').on('change', function(e){

        let pesquisa =  "";
        if($(this).checked == true){
            pesquisa = "Sim";
        }else{
            pesquisa = "Não";
        }

        tabelaRepo.column(3).search(pesquisa).draw();
    });

    $('#chkDesabilitado').on('change', function(e){

        let pesquisa =  "";
        if($(this).checked == true){
            pesquisa = "Sim";
        }else{
            pesquisa = "Não";
        }

        console.log(tabelaRepo.column(4))
        tabelaRepo.column(4).search(pesquisa).draw();
    });

    $('#chkDownload').on('change', function(e){

        let pesquisa =  "";
        if($(this).checked == true){
            pesquisa = "Sim";
        }else{
            pesquisa = "Não";
        }

        console.log(tabelaRepo.column(5))
        tabelaRepo.column(5).search(pesquisa).draw();
    });

    

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        
        let desabilitado = ""
        let arquivado = ""
        let download = ""
    
        if($('#chkDesabilitado')[0].checked == true){
            desabilitado = "Sim"
        }else{
            desabilitado = "Não"
        }

        if($('#chkArquivado')[0].checked == true){
            arquivado = "Sim"
        }else{
            arquivado = "Não"
        }

        if($('#chkDownload')[0].checked == true){
            download = "Sim"
        }else{
            download = "Não"
        }
        
        console.log(download)
        console.log(data[5])
        if (arquivado == data[3] && desabilitado == data[4] && download == data[5]) {
            return true;
        }
        return false;
    });
})