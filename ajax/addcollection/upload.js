

/* global fileupload */

/**
 * 
 * @returns {undefined}
 */
 async function uploadFile() {
  let formData = new FormData(); 
  let photo    = fileupload.files[0]['name'];
  
  formData.append("file", fileupload.files[0]);
  await fetch('ajax/upload.php', {
    method: "POST", 
    body: formData,
    file: photo
  });    
  swal({
    title: photo+" hochgeladen",
    type: "success",
    showCancelButton: false,
    confirmButtonText: "OK",
    closeOnConfirm: true,
    closeOnCancel: false
  });
  return photo;
}
