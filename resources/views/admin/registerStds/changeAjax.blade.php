@isset($usersId)
{{$countUsers= count($usersId)}}
    @for($i=0;$i<$countUsers;$i++)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{ $usersId[$i]}}</td>
            <td><a  > <i class="feather icon-edit"></i></a>
                <a  > <i class="feather icon-x-circle"></i></a>
            </td>
        </tr>
    @endfor
@endisset



<!--

-->
