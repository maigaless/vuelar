<template>
  <div class="w-full mx-auto ">
    <h1 class="text-3xl font-bold mb-4">Products List</h1>
    <ul class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4">
      <li v-for="product in products" :key="product.id" class="bg-white rounded shadow-md p-4">
        <h2 class="text-lg font-bold mb-2">{{ product.name }}</h2>
        <p class="text-gray-600 mb-4">{{ product.description }}</p>
        <p class="text-lg font-bold mb-2">${{ product.price }}</p>
        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" @click="addToCart(product)">Add to Cart</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [
        { id: 1, name: 'Product 1', description: 'This is product 1', price: 10.99 },
        { id: 2, name: 'Product 2', description: 'This is product 2', price: 9.99 },
        { id: 3, name: 'Product 3', description: 'This is product 3', price: 12.99 },
        { id: 3, name: 'Product 4', description: 'This is product 3', price: 12.99 },
        { id: 3, name: 'Product 5', description: 'This is product 3', price: 12.99 },
        { id: 3, name: 'Product 6', description: 'This is product 3', price: 12.99 },
        // Add more products here...
      ]
    }
  },
  methods: {
    addToCart(product) {
      // Add product to cart logic here...
      console.log(`Added ${product.name} to cart`)
    }
  }
}
</script>

<style scoped>
/* Add custom styles here... */
</style>
