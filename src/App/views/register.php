<?php include $this->resolve("partials/_header.php"); ?>

<section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <form method="POST" class="grid grid-cols-1 gap-6">
        <!-- Your existing form fields here -->

        <!-- Full Name -->
        <label class="block">
            <span class="text-gray-700">Full Name</span>
            <input value="<?= $oldFormData['fullName'] ?? ''; ?>" name="fullName" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Oghenekewe Ejukorlem" />
            <?php if (isset($errors['fullName']) && !empty($errors['fullName'])) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?= $errors['fullName'][0]; ?>
                </div>
            <?php endif; ?>
        </label>

        <!-- Student ID -->
        <label class="block">
            <span class="text-gray-700">Student ID</span>
            <input value="<?= $oldFormData['studentID'] ?? ''; ?>" name="studentID" type="text,numbers" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="123456" />
            <?php if (isset($errors['studentID']) && !empty($errors['studentID'])) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?= $errors['studentID'][0]; ?>
                </div>
            <?php endif; ?>
        </label>

        <!-- Grade Level -->
        <label class="block">
            <span class="text-gray-700">Grade Level</span>
            <input value="<?= $oldFormData['gradeLevel'] ?? ''; ?>" name="gradeLevel" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="10th Grade" />
            <?php if (isset($errors['gradeLevel']) && !empty($errors['gradeLevel'])) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?= $errors['gradeLevel'][0]; ?>
                </div>
            <?php endif; ?>
        </label>

        <!-- Date of Birth -->
        <label class="block">
            <span class="text-gray-700">Date Of Birth</span>
            <input value="<?= $oldFormData['dateOfBirth'] ?? ''; ?>" name="dateOfBirth" type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            <?php if (isset($errors['dateOfBirth']) && !empty($errors['dateOfBirth'])) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?= $errors['dateOfBirth'][0]; ?>
                </div>
            <?php endif; ?>
        </label>

        <!-- Parent/Guardian Information -->
        <label class="block">
            <span class="text-gray-700">Parent/Guardian Information</span>
            <input value="<?php echo $oldFormData['email'] ?? ''; ?>" name="email" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Parent/Guardian Email Address." />
            <?php if (isset($errors['email']) && !empty($errors['email'])) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?= $errors['email'][0]; ?>
                </div>
            <?php endif; ?>
        </label>

        <!-- Password -->
        <label class="block">
            <span class="text-gray-700">Password</span>
            <input name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
            <?php if (isset($errors['password']) && !empty($errors['password'])) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?= $errors['password'][0]; ?>
                </div>
            <?php endif; ?>
        </label>

        <!-- Confirm Password -->
        <label class="block">
            <span class="text-gray-700">Confirm Password</span>
            <input name="confirmPassword" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            <?php if (isset($errors['confirmPassword']) && !empty($errors['confirmPassword'])) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?= $errors['confirmPassword'][0]; ?>
                </div>
            <?php endif; ?>
        </label>

        <!-- "Create Account" Button -->
        <div class="mt-4">
            <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                Create Account
            </button>
        </div>
    </form>
</section>