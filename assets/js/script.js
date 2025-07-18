
// delete function

function deletListing(){

    this.intialize = function(){
        this.registerEvents();
    },

    this.registerEvents = function(){
        document.addEventListener('click' , function(e){
            targetElement = e.target;
            classList = targetElement.classList;
            
            // BUYERS DELETE FUNCTION !!
            if(classList.contains('del_buyers')){
                e.preventDefault();
                userId = targetElement.dataset.userid;
                console.log(userId);

                if(window.confirm('This will permanently delete your listing!')){
                    $.ajax({
                        method: 'POST',
                        data: {
                            user_id: userId
                        },
                        url: '../../database/delete-data/buyers_del.php',
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

            // RENTERS DELETE FUNCTION !!
            if(classList.contains('del_renters')){
                e.preventDefault();
                userId = targetElement.dataset.userid;
                console.log(userId);

                if(window.confirm('This will permanently delete your listing!')){
                    $.ajax({
                        method: 'POST',
                        data: {
                            user_id: userId
                        },
                        url: '../../database/delete-data/renters_del.php',
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

            // POTENTIAL DELETE FUNCTION !!
            if(classList.contains('del_potential')){
                e.preventDefault();
                userId = targetElement.dataset.userid;
                console.log(userId);

                if(window.confirm('This will permanently delete your listing!')){
                    $.ajax({
                        method: 'POST',
                        data: {
                            user_id: userId
                        },
                        url: '../../database/delete-data/potential_del.php',
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
};

// change background color of sidebar items on hover
// sidebarItems = document.querySelectorAll('.tab1,.tab2');
// sidebarItems.forEach(function(item){
//     item.addEventListener('mouseover', function(){
//         item.style.backgroundColor = '#f5f5f5';
//     });
//     item.addEventListener('mouseout', function(){
//         item.style.backgroundColor = '#fff';
//     });
// });

//show and hide sidebar_items dropdown
function subMenuSideBar(){
    document.addEventListener('click', function(e){
        let clickedEl = e.target;

        if(clickedEl.classList.contains('showHideSubmenu')){
            let subMenu = clickedEl.closest('li').querySelector('.subMenu');
            let sideBarItems = clickedEl.closest('li').querySelector('.dropDownArrow');
            
            //rotate the dropdown arrow
            if(sideBarItems != null){
                if(sideBarItems.style.transform == 'rotate(-90deg)') sideBarItems.style.transform = 'rotate(0deg)';
                else sideBarItems.style.transform = 'rotate(-90deg)';
            }
            //check for submenu
            if(subMenu != null){
                if(subMenu.style.display == 'block') subMenu.style.display = 'none';
                else subMenu.style.display = 'block';   
            }
        }
    })
};

new DataTable('#listingTable', {
    search: {
        return: true
    }
});


var deletListing = new deletListing;
deletListing.intialize();
subMenuSideBar();