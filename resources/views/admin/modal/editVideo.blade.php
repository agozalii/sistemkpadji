<div class="modal fade" id="editVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-5" style="width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('updateVideo', $data->id) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')

                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Id Video</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control-plaintext" id="id" name="id"
                            value="{{ $data->id }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Nama Admin</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->nama }}" readonly>
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Video</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="video" value="{{ $data->video }}">
                            <video src="{{ asset('storage/videos/' . $data->video) }}" id="previewVideo" class="mb-2 preview" width="320" height="240" controls></video>
                            <input class="form-control" type="file" accept=".mp4, .avi, .mov" value="{{ $data->video }} id="inputVideo" name="video" onchange="previewVideo()">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Judul Video</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="judul_video" name="judul_video"
                                value="{{ $data->judul_video }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="deskripsi_video" name="deskripsi_video"
                                value="{{ $data->deskripsi_video }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
