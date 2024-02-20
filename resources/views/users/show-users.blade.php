<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->

        <div class="container mt-5">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10%;">Serial No</th>
                    <th style="width: 40%;">Users</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $serialNumber = 1;
                @endphp
                @foreach($users as $user)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>
                            Name: {{ $user->name }} <br>
                            Email: {{ $user->email }}<br>
                        </td>
                        <td>


                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="/create/users/{{$id}}">
                <button type="button" class="btn rounded-pill btn-primary">Add User</button>
            </a>
            <br>

        </div>
    </div>


</x-layouts.app>
