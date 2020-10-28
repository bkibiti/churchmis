
<script>

    @if($flash = session("alert-success"))
        $(document).Toasts('create', {
            class: 'bg-success', 
            title: 'Success',
            autohide: true,
            delay: 3000,
            body: '{{session("alert-success")}}'
        })
    @endif
    
    
    @if($flash = session("alert-danger"))
        $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Warning',
            autohide: true,
            delay: 3000,
            body: '{{session("alert-danger")}}'
        })
    @endif
    
    
    @if($errors->any())  
   
        @foreach($errors->all() as $error)   
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Error',
                autohide: true,
                delay: 5000,
                body: '{{$error}}'
            })
        @endforeach

    @endif
    
</script>