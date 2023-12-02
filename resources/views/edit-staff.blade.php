<x-layout>
    <main class="mw-100 col-11">
        <div class="col-md-12 mt-2">
            <div class="card shadow-lg border-0"> <!-- Add the border-0 class to remove the border -->
                <div class="card-header ">
                    <div class="me-5 ms-5">
                        <h1>Update Staff Information</h1>
                
                    </section>
                       
                        <form method="post" action="{{ route('admin.update-members', ['id' => encrypt($member->id)]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{ $member->name }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="degrees">Degrees:</label>
                                <input type="text" name="degrees" value="{{ $member->degrees }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" name="position" value="{{ $member->position }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" class="form-control-file" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>


                    </div>
                </div>
            </div>


    </main>
</x-layout>