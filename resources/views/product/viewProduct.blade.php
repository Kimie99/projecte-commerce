<html>
    <body>
        <table>
            @foreach ($products as $product)
            <tr>
                <th style="border: 1px solid black;">Product</th>
                <th style="border: 1px solid black;">Price</th>
                <th style="border: 1px solid black;">Category</th>
                <th style="border: 1px solid black;">Quantity Item</th>
                <th style="border: 1px solid black;">Description</th>
                <th style="border: 1px solid black;">Image Item</th>
                <th style="border: 1px solid black;" colspan="2">Action</th>

            </tr>
            <tr>
                <td style="border: 1px solid black;">{{ $product->product_name }}</td>
                <td style="border: 1px solid black;">{{ $product->product_price }}</td>
                <td style="border: 1px solid black;">{{ $product->product_category }}</td>
                <td style="border: 1px solid black;"><center>{{ $product->product_qty }}</center></td>
                <td style="border: 1px solid black;">{{ $product->description }}</td>
                <td style="border: 1px solid black;"><img src="{{ asset("storage/{$product->path_image}") }}" width="80px" height="80px" alt="Image"></td>
                {{-- Delete --}}
                {!! Form::open(['route' => ['product.destroy', $product->id], 'method'=> 'delete']) !!}
                <td style="border: 1px solid black;"> {!! Form::button('Delete', ['type'=> 'submit','onclick' => "return confirm('Anda Betul-Betul Pasti 100%')"]) !!}</td>
                {!! Form::close() !!}
                {{-- Edit --}}
                <td style="border: 1px solid black;"><a href="{{ route('product.edit', $product->id) }}"><button>Edit</button></a></td>

            </tr>
            @endforeach

        </table>


    </body>

</html>
