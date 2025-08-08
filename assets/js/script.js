
// delete function

function deletListing() {

    this.intialize = function () {
        this.registerEvents();
    },

    this.registerEvents = function () {
        document.addEventListener('click', function (e) {
            // find the element that has the delete class
            let targetElement = e.target.closest('.del_sellers, .del_renters, .del_potential, .del-site_visit');
            if (!targetElement) return; // click was not on a delete button

            let classList = targetElement.classList;

            const deleteMap = {
                'del_sellers': '../../database/delete-data/sellers_del.php',
                'del_renters': '../../database/delete-data/renters_del.php',
                'del_potential': '../../database/delete-data/potential_del.php',
                'del-site_visit': '../../database/delete-data/site_visit_del.php'
            };

            for (let className in deleteMap) {
                if (classList.contains(className)) {
                    e.preventDefault();
                    let userId = targetElement.dataset.userid; // always correct now
                    console.log(userId);

                    if (window.confirm('This will permanently delete your listing!')) {
                        $.ajax({
                            method: 'POST',
                            data: { user_id: userId },
                            url: deleteMap[className],
                            dataType: 'json',
                            success: function (data) {
                                if (data.success) {
                                    alert(data.message);
                                    location.reload();
                                } else {
                                    alert(data.message);
                                }
                            }
                        });
                    } else {
                        console.log('Listing Saved');
                    }
                }
            }
        });
    }
};


// $(document).ready(function () {
//   $('.action-btn').on('click', function (e) {
//     e.stopPropagation();
//     $('.dropdown-menu').not($(this).next()).hide();
//     $(this).next('.dropdown-menu').toggle();
//   });

//   $(document).on('click', function () {
//     $('.dropdown-menu').hide();
//   });
  
//   $('.delete-action').on('click', function (e) {
//     e.preventDefault();
//     const id = $(this).data('id');
//     if (confirm('Are you sure you want to delete this entry?')) {
//       // Redirect or AJAX call to delete
//       window.location.href = 'delete_potential.php?id=' + id;
//     }
//   });   
// });
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