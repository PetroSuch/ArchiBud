$(function() {
    if(window.id && id !=  null){
        console.log('asdasd',id)
        loadProjectById(id)

    }
    getStatus()

    function getStatus(){
        $.ajax({
            type: "GET",
            url: "/rest/get-status",
            processData: false,
            contentType: 'application/json',
            success: function (data) {
                console.log(data)
                data.map((item)=>{
                    let el = $('#statusProject').find('option').eq(0);
                        el.text(item.status)
                        $('#inputState').append(el)
                    console.log(item,el)
                })

            },
            error: function(data){
                console.log('asda')
            }
        })
    }

    function loadProjectById(id) {
        $('#save_prj').attr('data-id',id)
        $.ajax({
            type: "GET",
            url: "/rest/get-project?id="+id,
            processData: false,
            contentType: 'application/json',
            //contentType: 'multipart/form-data', 
            success: function (data) {
                console.log(data);
                let date,
                    id;
                if(data.hasOwnProperty('project')){
                    id = data.project.id
                    date = data.project.date
                    for(k in data.project){
                        if($('input[name="'+k+'"]').length != 0){
                            $('input[name="'+k+'"]').attr('value',data.project[k])
                        }
                    }
                }
                if(data.hasOwnProperty('img')){
                    for(let k in data.img){
                        let name = data.img[k].type+'_'+k
                        let el = $('.wrap-preview-img').eq(0).clone()
                            el.addClass('added-file').attr({'data-file-id':data.img[k].id,'data-file':data.img[k].img});
                            el.find('input').attr('name',name);
                            el.find('.btn-settings').prepend('<i id="trash_img" class="btn-files fas fa-trash-alt"></i>')
                            el.find('.preview-img').css({'background-image':'url(../web/pics/projects/'+date+'/'+id+'/'+data.img[k].img+')'});
                        if(data.img[k].type == 'render'){
                            $('#render').find('.wrap-preview-img').eq(0).after(el)
                            console.log($('#render'))
                        }else{
                            console.log($('#plan'))
                            $('#plan').find('.wrap-preview-img').eq(0).after(el)
                        }
                    }
                    $('#render').find('.wrap-preview-img').eq(0).remove()
                    $('#plan').find('.wrap-preview-img').eq(0).remove()
                    $('#render').find('.wrap-preview-img').eq(0).find('#trash_img').remove()
                    $('#plan').find('.wrap-preview-img').eq(0).find('#trash_img').remove()
                }
            }
        });
    }
    $(document).on('click','#save_prj',function (event) {

        if($('#project_form').valid() == false) return true
        var json = $('#project_form').serializeArray();
        console.log($('#project_form').serializeArray())
        let fd = new FormData();
            fd.append('json',JSON.stringify(json));

        if(del_files && del_files.length > 0){
            fd.append('del_files',JSON.stringify(del_files));
        }  
        if($(this).attr('data-id')){
            fd.append('id',$(this).attr('data-id'));
        }

        $('input[type=file]').each(function(){
            if($(this).prop('files').length > 0){
                fd.append($(this).attr('name'),$(this).prop('files')[0])
            }
        })

        $.ajax({
            type: "POST",
            url: "/rest/save",
            data: fd,
            processData: false,
            contentType: false,
            //contentType: 'multipart/form-data', 
            success: function (data) {
                del_files = [];
                console.log(data);
                       Swal.fire(
                          'Збережено!',
                          '',
                          'success'
                        )
                    setTimeout(()=>{
                        location.reload()
                        window.location = '/projects-list'
                    })
            },
            error: function (errormessage) {
                console.log("not working",errormessage.responseText);
                Swal.fire(
                          'Помилка!',
                          errormessage.responseText,
                          'error'
                        )
            }
        });
    })
    $(document).on('click','#delete_project',function () {
        var conf = confirm("Видалити проект?");
        console.log('delete',conf,$(this).attr('data-id'))
        if(conf){
            $.ajax({
                type: "POST",
                url: "/rest/delete-project",
                data: JSON.stringify({'id':$(this).attr('data-id')}),
                processData: false,
                contentType: 'application/json',
                //contentType: 'multipart/form-data', 
                success: function (data) {
                    console.log(data);
                    if(data.del_prj == true){
                        Swal.fire(
                          'Видалено!',
                          '',
                          'success'
                        )
                        setTimeout(()=>{
                            location.reload();
                        },2000)
                    }
                   // location.reload()
                }
            });
        }
    })
    $(document).on('click','#add_file_input',function (event) {
        var id = 0;
            if($(this).prev().length > 0){
                id = $(this).prev().find('input').attr('name').split('_')[1]
                id = +id+1;
            }
           
        var type = $(this).attr('data-type');
        var input = '<div class="wrap-preview-img">'+
                      '<div class="preview-img"></div>'+
                      '<div class="btn-settings">'+
                       ' <i style="display:'+(id==0?'none':'inline-block')+';" id="trash_img" class="btn-files fas fa-trash-alt"></i>'+
                        '<i id="add_img" class="btn-files fas fa-upload"></i>'+
                      '</div>'+
                      '<input type="file" accept="image/x-png,image/gif,image/jpeg"  name="'+type+'_'+id+'">'+
                    '</div>'
        $(this).before(input)
    })
    var del_files = [];
    function delFile(id,file){
        if(id && file){
            del_files.push({'id':id,'file':file});
        }
    }

    $(document).on('click','#trash_img',function (event) {
      //  var del_files = del_files || [];
        if($(this).parents('.wrap-preview-img').attr('data-file') != undefined){
            let el = $(this).parents('.wrap-preview-img');
            delFile(el.attr('data-file-id'),el.attr('data-file'))
           // del_files.push()
        }
        console.log(del_files)
        $(this).parents('.wrap-preview-img').remove()
    })
    $(document).on('click','#add_img',function (event) {
        $(this).parents('.wrap-preview-img').find('input').click()
    })
    $(document).on('change','input[type="file"]',function (event) {
        let el = $(this)
        if($(this).parents('.wrap-preview-img').attr('data-file') != 'undefined'){
            let el = $(this).parents('.wrap-preview-img');
            delFile(el.attr('data-file-id'),el.attr('data-file'))
            el.removeAttr('data-file')
        }
        console.log(del_files)
        if (el.prop('files') && el.prop('files')[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              el.parents('.wrap-preview-img').find('.preview-img').css({'background-image':'url('+e.target.result+')'});
            }
            reader.readAsDataURL(el.prop('files')[0]);
            el.parents('.wrap-preview-img').addClass('added-file')
           // el.parents('.wrap-preview-img').find('#add_img').css({'display':'none'});
           // el.parents('.drop-files')
            
        }
    })
})