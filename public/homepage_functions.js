function upload(){
  /* The plan:
  1. get files from upload button and add them to array 
  2. using the array, loop through and append files to the FormData so they can be uploaded
  3. push file to upload, time out if error, close modal on success
  4. link the uploaded files to the php file for server requests/communication with database
   */

  //line to get input from upload-btn
  const input = document.querySelector('filequeue');
  const modalData = new FormData(); 
  //files array
  const modalFiles = [];

  //until the array reads all the input, append input to array from the input at postition i (0, 1, 2,  . . . inputLength)
  for(const file in input){
    modalFiles.append(file);
  }

  //should add entire array to modalData
  modalData.append("files", modalFiles);
  
  //method to get php file and post modalData
  fetch('uploadlink.php', {
    method: "GET", 
    //body: modalData
  }).then((jsonResponse) => {
    console.log(jsonResponse);
  })
  .catch((err) => {
    // handle error
    console.error(err);
  });

  alert('files have been uploaded');
}