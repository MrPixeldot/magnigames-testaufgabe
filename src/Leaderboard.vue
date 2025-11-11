<template>
    <button class="button" @click="toggleShow">
        <span v-if="!show">Show stuff</span>
        <span v-else>Hide stuff </span>
    </button>
    <div v-if="show">
        <div class="box" @mouseover="handleEvent($event, 67)">mouseover (enter)</div>
        <div class="box" @mouseleave="handleEvent">mouseleave</div>
        <div class="box" @dblclick="handleEvent">doubleclick</div>
        <div class="box" @mousemove="handleMouseMove">position {{ x }} || {{ y }}</div>
        <div v-show="show">
        <p class="text">{{ player }} || {{ score }}</p>
        <button class="button" @click="score++">Increase score</button>
        <button class="button" @click="score--">Decrease score</button>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      players: [
        {name: 'Martin Siebert', city: 'Braunschweig'},
        {name: 'Jakob Simko', city: 'Salzburg'},
        {name: 'Eric Biering', city: 'Broitzem'}
      ],
      score: 0,
      show: false,
      x: 0,
      y: 0,
    }
},
methods: {
    toggleShow() {
        this.show = !this.show
    },
    handleEvent(e, data) {
        console.log(e, e.type)
        if (data)
        console.log(data)
    },
    handleMouseMove(e) {
        this.x = e.offsetX
        this.y = e.offsetY
    }
    }
}
</script>

<style>
.box {
  padding: 100px 0;
  width: 400px;
  text-align: center;
  display: inline-block;
  margin: 20px;
  background: #2e2e2e;
  border-radius: 8px;    
  font-family: monospace;
  color: azure;
}
.button {
 margin: 2px;
 font-family: monospace;
}
.text {
    font-family: monospace;
    margin-left: 4px;
}
.list {
 margin: 2px;
 font-family: monospace bold;
}
</style>
