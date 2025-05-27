@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-users-cog me-2"></i> إدارة المستخدمين</h2>

    @if ($users->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا يوجد مستخدمون لعرضهم.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">اسم المستخدم</th>
                                <th scope="col">البريد الإلكتروني</th>
                                <th scope="col">الدور</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $userItem) {{-- تجنب تضارب الاسم مع $user في layouts --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $userItem->full_name }}</td>
                                    <td>{{ $userItem->username }}</td>
                                    <td>{{ $userItem->email }}</td>
                                    <td>
                                        <span class="badge {{
                                            $userItem->role == 'مدير' ? 'bg-danger' :
                                            ($userItem->role == 'بائع' ? 'bg-info' :
                                            'bg-secondary')
                                        }}">
                                            {{ $userItem->role }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $userItem->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.users.edit', $userItem->id) }}" class="btn btn-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل"><i class="fas fa-edit"></i></a>
                                        @if (Auth::id() !== $userItem->id && !$userItem->isAdmin()) {{-- منع حذف المشرف لنفسه أو لمشرفين آخرين --}}
                                            <form action="{{ route('admin.users.destroy', $userItem->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟ سيتم حذف جميع بياناته وطلباته ومنتجاته.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection