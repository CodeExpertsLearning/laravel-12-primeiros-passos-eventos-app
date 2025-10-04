@push('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#body',
            license_key: 'gpl',
            menubar: false,
            statusbar: false,
            promotion: false
        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', (e) => {
            let im = new Inputmask('99/99/9999 99:99:99')
            im.mask(document.getElementById('start_event'))
            im.mask(document.getElementById('end_event'))
        })
    </script>
@endpush
