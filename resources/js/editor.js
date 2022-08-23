import '../vendor/ckeditor.css';
import * as ckeditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', function() {
    ckeditor.create(
        document.querySelector('#body'), {},
    ).catch(error => {
        console.error(error);
    });
});
