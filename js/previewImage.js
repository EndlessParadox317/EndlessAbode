var input = document.getElementById("image-upload");
var preview = document.getElementById("preview-image");
    
    input.addEventListener('change', PreviewImageFunc); // actively listens to changes on the upload images section


function PreviewImageFunc(){
    const file = input.files[0];  // Get the first uploaded file

      if (file) {
        // Create a temporary URL for the image
        const imageUrl = URL.createObjectURL(file);

        // Set the src of the image preview
        preview.src = imageUrl; //basically html tag img src manual input to the custom made temporary url from that file
        preview.style.display = 'block';  // Show the image
      }
      

}