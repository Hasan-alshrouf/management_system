<a href="/users" class="btn btn-secondary mx-4 mt-4">Back
    <i class="fa-sharp fa-solid fa-backward"></i>
</a>
<div class="main-block mb-5 ">


    <h1 class="mt-4  opacity-75">Create New User</h1>


    <form action="/users/store " method="POST">
        <div class="info">
            <input class="Email" type="email" name="email" placeholder="Email" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="tel" name="mobile_number" placeholder="Phone">



            <button type="submit" class="button">Create</button>
    </form>
</div>