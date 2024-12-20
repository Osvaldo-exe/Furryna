<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1>Product</h1>
    <div class="wrapper">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Picture</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach($products as $items): ?>   
                <tr>
                    <td class='product-row'>
                        <?php echo htmlspecialchars($items->product_name); ?>
                    </td>
                    <td> 
                        <img src='../images/Products-Images/<?php echo htmlspecialchars($items->image); ?>' alt='Product Image' class='product-image'>
                    </td>
                    <td style="width: 600px"><?php echo htmlspecialchars($items->product_description); ?></td>
                    <td><?php echo 'Rp '.number_format(htmlspecialchars($items->price), 2,',','.') ?></td>
                    <td class='action-buttons'>
                        <form action="{{route('dropProduct', $items->id)}}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-delete' type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>  
            </tbody>
        </table>
    </div>
</body>
</html>
