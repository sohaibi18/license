<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->

        <div class="container mt-5">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10%;">Serial No</th>
                    <th style="width: 40%;">Roles</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $serialNumber = 1;
                @endphp
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>
                            {{ $role->name }} <br>

                        </td>
                        <td>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="/create/roles/{{$id}}">
                <button type="button" class="btn rounded-pill btn-primary">Add Role</button>
            </a>
            <br>

        </div>
    </div>


</x-layouts.app>
