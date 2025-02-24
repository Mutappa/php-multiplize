<div class="listing_content">
    <table cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Property Type</th>
                <th>Location</th>
                <th>Pincode</th>
                <th>Price</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listings as $index => $user){?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $user['owner_name'] ?></td>
                    <td><?= $user['phone_number'] ?></td>
                    <td><?= $user['owner_email'] ?></td>
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['property_type'] ?></td>
                    <td><?= $user['building_location'] ?></td>
                    <td><?= $user['pincode'] ?></td>
                    <td><?= '₹',$user['price'] ?></td>
                    <td><?= date('M d, Y ' , strtotime($user['listing_date'])) ?></td>
                    <td class="options_box">
                            <a href="" class="edit_listing"><i class="fa fa-pencil"></i>Edit</a>
                            <a href="" class="delete_listing" data-userid="<?= $user['listing_id']?>"><i class="fa fa-trash"></i>Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>