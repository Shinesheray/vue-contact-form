<template>
<div>
<div class="max-w-2xl mx-auto">

<table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
  <tr class="text-left border-b border-gray-300">
    <th class="px-4 py-3">Name</th>
    <th class="px-4 py-3">Email</th>
    <th class="px-4 py-3">Gender</th>
    <th class="px-4 py-3">Content</th>
  </tr>
  <tr class="bg-gray-700 border-b border-gray-600">
    <td class="px-4 py-3">{{form.name}}</td>
    <td class="px-4 py-3">{{form.email}}</td>
    <td class="px-4 py-3">{{form.gender}}</td>
    <td class="px-4 py-3">{{form.content}}</td>
  </tr>    
</table>

	</div>
	</div>
</template>

<script>
export default {
//this passes the props information to the next page - login which will display each of the elements in the DB
  props: ['form']
}

// I have searched and tried to get the data table to show but it is not returning I am not sure what could be the issue
</script>
