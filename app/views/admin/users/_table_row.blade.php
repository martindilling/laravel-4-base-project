<tr>
    <td>
        {{ $item->id }}
    </td>
    <td>{{ $item->present()->fullName }}</td>
    <td>{{ $item->present()->email }}</td>
    <td>{{ $item->present()->created }}</td>
    <td>
        <div class="btn-group">
            <a href="{{ route('admin.users.show', array('id' => $item->id)) }}" type="button" class="btn btn-default">Show</a>
            <a href="{{ route('admin.users.edit', array('id' => $item->id)) }}" type="button" class="btn btn-info">Edit</a>
            <a href="{{ route('admin.users.destroy', array('id' => $item->id)) }}" type="button" class="btn btn-danger">Delete</a>
        </div>
    </td>
</tr>
