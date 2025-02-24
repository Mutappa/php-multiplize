
// delete function

function deletListing(){

    this.intialize = function(){
        this.registerEvents();
    },

    this.registerEvents = function(){
        document.addEventListener('click' , function(e){
            targetElement = e.target;
            classList = targetElement.classList;
            
            if(classList.contains('delete_listing')){
                e.preventDefault();
                userId = targetElement.dataset.userid;
                console.log(userId);

                if(window.confirm('This will permanently delete your listing!')){
                    $.ajax({
                        method: 'POST',
                        data: {
                            user_id: userId
                        },
                        url: '../database/delete_listing.php',
                        dataType:'json',
                        success: function(data){
                            if(data.success){
                                if(window.confirm(data.message)){
                                    location.reload();
                                }
                            } else window.alert(data.message);
                        }
                    })
                } else {
                    console.log('Listing Saved');
                }
            }
             
        })
    }
}

var deletListing = new deletListing;
deletListing.intialize();