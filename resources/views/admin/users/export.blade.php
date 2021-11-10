<table>
    <thead>
    <tr>
        <th>#</th>
        <th> اسم الطالب</th>
        <th>الحساب </th>
        <th>العنوان</th>
        <th>الهاتف</th>
        <th>تاريخ الميلاد</th>
        <th>الحالة</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->user_name }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->birthday }}</td>
            <td>{{ $user->active=='1'? 'نشط': 'غير نشط' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
