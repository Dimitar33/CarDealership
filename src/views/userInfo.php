<?php require __DIR__ . "/../../public/templates/header.php"; ?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px"
                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                    class="font-weight-bold"><?php echo ($user['username']); ?></span><span
                    class="text-black-50"><?php echo ($user['email']); ?></span><span>
                </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="POST" action="index.php?controller=user&action=handle">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label><input name="username" type="text" class="form-control"
                                placeholder="<?php echo ($user['username']); ?>" value="<?php echo ($user['username']); ?>"></div>
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input name="phone" type="text"
                                class="form-control"
                                placeholder="<?php echo ($user['phone']) ?: "enter phone number" ?>" value="<?php echo ($user['phone']); ?>"></div>
                        <div class="col-md-12"><label class="labels">Address Line</label><input name="address_line" type="text"
                                class="form-control"
                                placeholder="<?php echo ($user['address_line']) ?: "enter address line" ?>" value="<?php echo ($user['address_line']); ?>">
                        </div>
                        <div class="col-md-12"><label class="labels">County</label><input name="county" type="text"
                                class="form-control" placeholder="<?php echo ($user['county']) ?: "enter county" ?>"
                                value="<?php echo ($user['county']); ?>"></div>
                        <div class="col-md-12"><label class="labels">Country</label><input name="country" type="text"
                                class="form-control" placeholder="<?php echo ($user['country']) ?: "enter country" ?>"
                                value="<?php echo ($user['country']); ?>"></div>
                        <div class="col-md-12"><label class="labels">Postcode</label><input name="postcode" type="text"
                                class="form-control" placeholder="<?php echo ($user['postcode']) ?: "enter postcode" ?>"
                                value="<?php echo ($user['postcode']); ?>"></div>
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <div class="mt-5 text-center"><button  type="submit" formaction="index.php?controller=user&action=update" name="action" value="update" class="btn btn-primary profile-button"
                                type="submit">Save
                                Profile</button></div>
                        <div class="mt-5 text-center"><button name="action" formaction="index.php?controller=user&action=delete" value="delete" class="btn btn-primary profile-button"
                                style="background-color:red;" type="submit">Delete
                                Profile</button></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>