<template>
  <br><br><br><br><br><br><br><br><br><br><br>
    <ul style="padding: 0px;">
        <li v-for="player in players" :class="{fav: player.isFav}" @click="toggleFav(player)">
            <img :src="player.wappen" style="width: 32px;">
            <span class="text">{{ player.name }} - {{ player.city}}</span> 
            <span class="score">{{ player.score }}</span>
        </li>
    </ul>
<button @click="regenerateScore" class="button">Regenerate score</button> 
<button @click="toggleShow" class="button"><span v-if="show">Hide computed list</span><span v-else>Show computed list</span></button> 
<br><br><br>
<p class="text">Favorite players:</p>
<ul style="padding: 0px;" v-show="show">
        <li v-for="player in filteredPlayers" :class="{fav: player.isFav}" @click="toggleFav(player)">
            <img :src="player.wappen" style="width: 32px;">
            <span class="text">{{ player.name }} - {{ player.city}}</span> 
            <span class="score">{{ player.score }}</span>
        </li>
    </ul>
</template>

<script>
function randomScore(max) {
      return Math.floor(Math.random() * max);
}

export default {
  data() {
    return {
      players: [
        {name: 'Martin Siebert', city: 'Braunschweig', wappen: '/Wappen1.png', score: randomScore(1111), isFav: false},
        {name: 'Jakob Simko', city: 'Salzburg', wappen: '/Wappen2.png', score: randomScore(1111), isFav: true},
        {name: 'Eric Biering', city: 'Broitzem', wappen: '/Wappen3.png', score: randomScore(1111), isFav: false},
        {name: 'Finn-Rico Burghardt', city: "Weststadt", wappen: '/Wappen4.png', score: randomScore(1111), isFav: false}
      ],
      show: false,
    }
},
methods: {
    toggleShow() {
        this.show = !this.show
    },
    regenerateScore() {
    this.players.forEach(player => {player.score = randomScore(1111)});
    console.log(this.regenerateScore)
    },
    toggleFav(player) {
      player.isFav = !player.isFav
      console.log(this.toggleFav)
    },
},
computed: {
    filteredPlayers() {
      return this.players.filter((player) => player.isFav)
    }
} 
}  
</script>

<style>
body {
  max-width: 500px;
  margin: 20px auto;
  transform: scale(1.3);
}
p, h3, ul {
  padding: 0px;
  margin: 0px;
}
li {
  display: flex;
  align-items: center;
  margin: 5px auto;
  background: #c9c9c9;
  border-radius: 8px;
  padding: 10px 20px;
}
.button {
  margin-left: 0px;
  margin-right: 4px;
  padding: 6px 12px;
  font-family: monospace;
  background: #444;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.text {
    text-align: left;
    flex: 1;
    font-family: monospace;
    margin-left: 4px;
}
.score {
  width: 80px;
  text-align: right;
  font-family: monospace;
}
li.fav {
  background: rgb(255, 179, 125);
  cursor: pointer;
}
</style>