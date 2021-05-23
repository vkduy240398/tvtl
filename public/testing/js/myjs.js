function changeglobal(id,properties){
    var control = $('#'+properties+id).attr('data-control');
    var global = 0;
    if($('#'+properties+id).is(':checked')){global = 1}
    if (id !='') {
        $.ajax({
            url:"admins/"+control +"/checkglobals",
            method:"post",
            data:{id:id,global:global,properties:properties},
            success:function(data){
                if (data) {
                    toastr.success('Cập nhật thành công', 'Chúc mừng')
                }
            }
        });
    }
}
function  deleteAll(control){
    var list_id ="";
    var success = confirm("are you sure");
    if (success == true) {
        $("input[name='foo']").each(function(){
            if (this.checked) {
                if ($(this).is(":checked")) {
                    $(this).parent().parent().remove();
                }
                list_id = list_id + ","+this.value;
            }
        });
        list_id=list_id.substr(1);
        debugger
       if (list_id != '') {
        debugger
           $.ajax({
             url:"admins/"+control +"/deleteAll",
             method:"POST",
             data:{list_id:list_id},
             success:function(data){
             debugger
                 if (JSON.parse(data) =="success") {
                    toastr.success('Cập nhật thành công', 'Chúc mừng')
                 }   
             }
           });
           debugger
       }
    }
}
function changeSort(sort,id){
    var control = $('#sort'+id).attr('data-control');
    var sort = sort.value;
    if(id != '')
    {
        $.ajax
        ({
            method: "POST",
            url: "admins/"+control+"/sort",
            data: { id:id,sort:sort},
            dataType: "json",
            success: function(data){
                if(data.rs == 1){
                    toastr.success('Cập nhật thành công', 'Chúc mừng')
                }
            }
        });
    }
}