@if (Auth::user()->hasRole('admin'))
    <script>
        window.location = "/admin/";
    </script>
@elseif(Auth::user()->hasRole('author'))
    <script>
        window.location = "/author/";
    </script>
@endif
