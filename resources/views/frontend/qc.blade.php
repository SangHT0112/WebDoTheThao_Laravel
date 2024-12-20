
<style>
    .modal {
        z-index: 1050 !important;
    }
    .modal-dialog-centered {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 70vh;
    }
    .modal-lg-custom {
        width: 80%;
        max-width: 1200px;

    }

</style>
@php
$qc=session('qc',[]);
@endphp
@if($qc)
    @foreach($qc as $index => $qcs)
        <div class="modal fade" id="exampleModalCenter{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg-custom" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ "/storage/".$qcs->imgs }}" style="width: 100%; height: 600px;">
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(window).on('load',function (){
                $('#exampleModalCenter'+{{$index}}).modal('show');
            });
        </script>
    @endforeach
@endif


