$(function(){
    var select;
    var options;
    var editStatusForm = $('#editstatusform');
    var editStatusFormAction;
    var addForm = $('#addDeviceForm');
    var addFormSerialInput;
    var ajaxRequests = new AjaxRequests();

    addForm.submit(function(){
        addFormSerialInput = $(this).children().find('input[name="serial"]');
        if(addFormSerialInput.val().trim().length < 5){
            return false;
        }
        return true;
    });

    $('.table').not('.not-dt').DataTable({
        "fnPreDrawCallback": function(){
            ajaxRequests.unregisterAjaxButtonsEvents();
            ajaxRequests.registerAjaxButtonsEvents();
        }
    });

    $('.myselect').select2();

    $('[data-toggle="tooltip"]').tooltip();

    $('.reminder-popover').popover({
       'trigger': 'focus'
    });
    
    $('.flash-message').delay(2000).slideUp('slow');

    $('#back_to_top').on('click', function(){
        $('html, body').animate({scrollTop: 0}, 500);
    });

    // ajaxRequests.registerAjaxButtonsEvents();

    // $('[name="DataTables_Table_0_length"]').on('change', function(){
    //     ajaxRequests.unregisterAjaxButtonsEvents();
    //     ajaxRequests.registerAjaxButtonsEvents();
    // });

    $('.dt-responsive th').on('click', function(){
        ajaxRequests.unregisterAjaxButtonsEvents();
        ajaxRequests.registerAjaxButtonsEvents();
    });

    $(window).scroll(function(){
        if($(this).scrollTop() < 100){
            $('#back_to_top').fadeOut(500);
        }else{
            $('#back_to_top').fadeIn(500);
        }
    });

    // Ajax Request
    function AjaxRequests(){
        var self = this;
        this.registerAjaxButtonsEvents = function(){
            $('.deletebtn').on('click', function(e){
                id = $(this).parent().siblings(':first-child').text();
                self.getSlugById('/getDeviceSlugById', 'post', '/devices', $('#deleteform'), id);
            });

            $('.deletetypebtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.getSlugById('/getDeviceTypeSlugById', 'post', '/types',$('#deletetypeform'), id);
            });

            $('.deletelocationbtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.getSlugById('/getDeviceLocationSlugById', 'post', '/locations',$('#deletelocationform'), id);
            });

            $('.deleteadminbtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.getSlugById('/getUserSlug', 'post', '/users/admins',$('#deleteadminform'), id);
            });

            $('.deletesystemuserbtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.getSlugById('/getUserSlug', 'post', '/users/systemusers',$('#deletesystemuserform'), id);
            });

            $('.deleteactivitybtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.createFormAction('/logs/activitylogs', $('#deleteactivityform'), id);
            });

            $('.deleteuserlogbtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.createFormAction('/logs/userlogs', $('#deleteuserlogform'), id);
            });

            $('.editstatusbtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.getDeviceForUpdatingStatus();
            });

            $('.editadminpermissionbtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.getUserSlugById('/users/admins', $('#editadminpermissionform'), id);
            });

            $('.editsystemuserpermissionbtn').on('click', function(){
                id = $(this).parent().siblings(':first-child').text().trim();
                self.getUserSlugById('/users/systemusers', $('#editsystemuserpermissionform'), id);
            });
        },
        this.unregisterAjaxButtonsEvents = function(){
            $('.deletebtn').unbind('click');
            $('.deletetypebtn').unbind('click');
            $('.deletelocationbtn').unbind('click');
            $('.deleteadminbtn').unbind('click');
            $('.editstatusbtn').unbind('click');
            $('.editadminpermissionbtn').unbind('click');
            $('.editsystemuserpermissionbtn').unbind('click');
        },
        this.getUserSlugById = function(preAction, formContainer, selectedId){
            formContainer.attr('action', preAction);
            var formActionContainer;
            $.ajax({
                url: '/getUserSlug',
                type: 'post',
                data: {
                    'id': selectedId,
                    '_token': formContainer.children('input[name="_token"]').val()
                },
                beforeSend: function(){
                    formContainer.find('input[type="submit"]').attr('disabled', 'disabled');
                },
                success: function(data){
                    slug = data;
                    formActionContainer = formContainer.attr('action') + '/' + slug + '/updatepermission';
                    formContainer.attr('action', formActionContainer);
                },
                error: function(){
                    formContainer.find('input[type="submit"]').attr('disabled', 'disabled');
                },
                complete: function(data){
                    formContainer.find('input[type="submit"]').removeAttr('disabled');
                }
            });
        },
        this.getSlugById = function(ajaxUrl, ajaxMethod, preAction, formContainer, selectedId){
            formContainer.attr('action', preAction);
            var formActionContainer;
                $.ajax({
                    url: ajaxUrl,
                    type: ajaxMethod,
                    data: {
                        'id': selectedId,
                        '_token': formContainer.children('input[name="_token"]').val()
                    },
                    beforeSend: function(){
                        formContainer.find('input[type="submit"]').attr('disabled', 'disabled');
                    },
                    success: function(data){
                        slug = data;
                        formActionContainer = formContainer.attr('action') + '/' + slug;
                        formContainer.attr('action', formActionContainer);
                    },
                    error: function(){
                        formContainer.find('input[type="submit"]').attr('disabled', 'disabled');
                    },
                    complete: function(){
                        formContainer.find('input[type="submit"]').removeAttr('disabled');
                    }
                });
        },
        this.getDeviceForUpdatingStatus = function(){
            editStatusForm.attr('action', '/devices');
            $.ajax({
                url: '/getDeviceById',
                type: 'post',
                data: {
                    'id': id,
                    '_token': editStatusForm.children('input[name="_token"]').val()
                },
                beforeSend: function(){
                    editStatusForm.find('input[type="submit"]').attr('disabled', 'disabled');
                },
                success: function(data){
                    slug = data.slug;
                    editStatusFormAction = editStatusForm.attr('action') + '/' + slug + '/updatestatus';
                    select = $('#editstatusselect');
                    options = select.children();
                    options.each(function(index){
                        if(options[index].value == data.status_id){
                            options[index].selected = true;
                        }
                    });
                    editStatusForm.attr('action', editStatusFormAction);
                },
                error: function(){
                    editStatusForm.find('input[type="submit"]').attr('disabled', 'disabled');
                },
                complete: function(){
                    editStatusForm.find('input[type="submit"]').removeAttr('disabled');
                }
            });
        },
        this.createFormAction = function(preAction, formContainer, selectedId){
            var formActionContainer;
            formContainer.attr('action', preAction);
            formActionContainer = formContainer.attr('action') + '/' + selectedId;
            formContainer.attr('action', formActionContainer);
        }
    }
    // Ajax Request
});