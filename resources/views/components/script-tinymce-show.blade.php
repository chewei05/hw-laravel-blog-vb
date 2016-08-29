   <!-- TinyMCE -->
   <script src="{{ asset('') }}asset/tinymce/tinymce.min.js"></script>
   <script>
      tinymce.init({
         selector: '#PostContent',
         toolbar: false,
         menubar:false,
         statusbar: false,
         readonly : 1
      });
   </script>