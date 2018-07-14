BootstrapDialog.show({
            message: 'I send ajax request!',
            buttons: [{
                icon: 'glyphicon glyphicon-send',
                label: 'Send ajax request',
                cssClass: 'btn-primary',
                autospin: true,
                action: function(dialogRef){
                    dialogRef.enableButtons(false);
                    dialogRef.setClosable(false);
                    dialogRef.getModalBody().html('Dialog closes in 5 seconds.');
                    setTimeout(function(){
                        dialogRef.close();
                    }, 5000);
                }
            }, {
                label: 'Close',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }]
        });