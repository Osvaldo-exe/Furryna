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
            <?php foreach($allUser as $person): ?>
                <form action="{{route('dropUser', $person->id)}}" method='POST'>
                    @csrf
                    <input style="border: none; border-bottom: 1px solid grey; background-color: #f4f4f9;" type="text" value="<?php echo htmlspecialchars($person->name)?>" readonly>
                    @method('DELETE')
                    <button class="userDeleteButton">Delete User</button>
                </form>
                <table style="margin-bottom: 1rem;">
                    <tbody> 
                        <?php foreach($userProducts[$person->email] as $items): ?>   
                            <tr>
                                <td class='product-row' style="width: 10rem;max-width: 10rem">
                                    <?php echo htmlspecialchars($items->product_name); ?>
                                </td>
                                <td style="width: 7rem; max-width: 7rem;"> 
                                    <img style="padding: 0" src='../images/Products-Images/<?php echo htmlspecialchars($items->image); ?>' alt='Product Image' class='product-image'>
                                </td>
                                <td style="width: 650px"><?php echo htmlspecialchars($items->product_description); ?></td>
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
            <?php endforeach; ?> 
    </div>
</body>
</html>
