<template>
  <svg class="-mb-40" width="200" viewBox="0 0 100 50" xmlns="http://www.w3.org/2000/svg">
    <path
      id="circlePath"
      fill="none"
      stroke-width="4"
      stroke="transparent"
      d="
          M 10, 50
          a 40,40 0 1,1 80,0
          a 40,40 0 1,1 -80,0
        "
    />
    <text id="text" font-family="sans" font-size="13" font-weight="bold" fill="currentColor">
      <textPath id="textPath" startOffset="50%" text-anchor="end"><slot /></textPath>
    </text>
  </svg>
</template>
