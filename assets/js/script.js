$(document).ready(function (){
    $('#idmhs').click(function (){
        $.ajax({
            url:'page/_dataMahasiswa.php',
            type : 'POST',
            success : function (data){
                $(".hasil").empty();
                $(".hasil").append(data);
                $('#myTable').DataTable();
            }
        })
    })
    $('#iduser').click(function (){
        $.ajax({
            url:'page/_dataUser.php',
            type : 'POST',
            success : function (data){
                $(".hasil").empty();
                $(".hasil").append(data);
                $('#myTable').DataTable();
            }
        })
    })
    $('#idortu').click(function (){
        $.ajax({
            url:'page/_dataOrangTua.php',
            type : 'POST',
            success : function (data){
                $(".hasil").empty();
                $(".hasil").append(data);
                $('#myTable').DataTable();
            }
        })
    })
    $('#idskl').click(function (){
        $.ajax({
            url:'page/_dataSekolah.php',
            type : 'POST',
            success : function (data){
                $(".hasil").empty();
                $(".hasil").append(data);
                $('#myTable').DataTable();
            }
        })
    })
    $('#myTable').DataTable();
    $(".toast").toast("show");
})