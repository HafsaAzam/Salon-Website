function addSerModal() {
    const html=`<div class="modal-header">
                    <h4 class="modal-title">Add Service</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">×</button>
                </div>
                <div class="modal-body">
                    <form id="myForm" enctype="multipart/form-data" action="add/addService.php" method="POST">
                        <div class="form-group">
                            <label for="s_name">Name:</label>
                            <input type="text" class="form-control" name="s_name" required="">
                            <label for="s_price">Price:</label>
                            <input type="number" class="form-control" name="s_price" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" name="upload">Add Service</button>
                        </div>
                    </form>

                </div>`;
   
    document.getElementById("serModal").style.display = "flex";
    document.querySelector(".modal-content").innerHTML=html;
    const form = document.getElementById("myForm");
    form.action = "add/addService.php";
}
function closeModal() {
    document.getElementById("serModal").style.display = "none";
}

function editServices(s_name) {
    const html=`<div class="modal-header">
                    <h4 class="modal-title">Update Service</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">×</button>
                </div>
                <div class="modal-body">
                    <form id="myForm" enctype="multipart/form-data" action="update/editService.php" method="POST">
                        <div class="form-group">
                            <label >Name:</label>
                            <input class="form-control" id="serviceName" name="s_name" readonly>
                            <label for="s_price">Price:</label>
                            <input type="number" class="form-control" name="s_price" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" name="upload">Update</button>
                        </div>
                    </form>

                </div>`;
    document.getElementById("serModal").style.display = "flex";
    document.querySelector(".modal-content").innerHTML=html;

    var label = document.getElementById('serviceName');
    label.innerHTML = s_name; 
    label.value=s_name;
}

function addGalleryImg(){
    const html3=`<div class="modal-header">
                    <h4 class="modal-title">Add Image</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">×</button>
                </div>
                <div class="modal-body">
                    <form id="myForm" enctype="multipart/form-data" action="add/addGallery.php" method="POST">
                        <div class="form-group">
                            <label for="img_id">Id:</label>
                            <input type="text" class="form-control" name="img_id" required="">
                            
                            <label for="gal_img">Upload Image:</label>
                            <input type="file" class="form-control-file" name="gal_img">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" name="submit" value="Upload">Add Image</button>
                        </div>
                    </form>

                </div>`;
   
    document.getElementById("serModal").style.display = "flex";
    document.querySelector(".modal-content").innerHTML=html3;
    const form = document.getElementById("myForm");
    form.action = "add/addGallery.php";
}

function editGalleryImg(gal_id) {
    const html=`<div class="modal-header">
                    <h4 class="modal-title">Update Gallery Image</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">×</button>
                </div>
                <div class="modal-body">
                    <form id="myForm" enctype="multipart/form-data" action="update/editGalleryImg.php" method="POST">
                        <div class="form-group">
                            <label >Name:</label>
                            <input class="form-control" id="gal_id" name="gal_id" readonly>
                            <label for="gal_img">Choose Image:</label>
                            <input type="file" class="form-control" name="gal_img" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" name="upload">Update</button>
                        </div>
                    </form>

                </div>`;
    document.getElementById("serModal").style.display = "flex";
    document.querySelector(".modal-content").innerHTML=html;

    var label = document.getElementById('gal_id');
    label.innerHTML = gal_id; 
    label.value=gal_id;
}