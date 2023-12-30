<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST">
            @csrf
            <!-- Basic Layout -->
            <div class="row">
                <!-- Personal Information -->
                <div class="col-xxl-10">
                    <!-- Table Section -->
                    <div class="card mb-4">
                        <div class="card-header">
                            @if(isset($successMessage))
                                <div class="alert alert-success">
                                    {{ $successMessage }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
