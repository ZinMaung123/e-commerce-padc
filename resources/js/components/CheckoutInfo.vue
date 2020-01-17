<template>
<div>
    <table>
        <thead>
            <tr>
                <th>
                    Product Name
                </th>
                <th>
                    SKU
                </th>
                <th>
                    Price
                </th>
                <th>
                    Qty
                </th>
                <th>
                    Subtotal
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="transaction of JSON.parse(transaction_details)" :key="transaction.id">
                <td v-text="transaction.product.name"></td>
                <td>{{ transaction.product.name }}</td>
                <td>{{ transaction.product.price }}</td>
                <td>{{ transaction.qty }}</td>
                <td>{{ transaction.cost }}</td>
            </tr>
        </tbody>
    </table>

    <label >Total price : {{ JSON.parse(transaction).total_cost }}</label>
    <a href="/product">Continue Shopping</a>
</div>
</template>
<script>
export default {
    props: ['transaction', 'transaction_details']
}
</script>