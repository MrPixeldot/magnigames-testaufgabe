<template>
    <button @click="toggleShow">
        <span v-if="!show">Show stats</span>
        <span v-else>Hide stats</span>
    </button>
    <div v-show="show">
        <p>{{ player }} || {{ score }}</p>
        <button @click="score++">Increase score</button>
        <button @click="score--">Decrease score</button></div>
</template>

<script>
export default {
  data() {
    return {
      player: 'Martin Siebert',
      score: 0,
      show: false
    }
},
methods: {
    toggleShow () {
        this.show = !this.show
    }
    }
}
</script>
