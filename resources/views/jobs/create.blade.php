<x-layout>
    <x-page-heading>New Job</x-page-heading>
    <x-forms.form method="Post" action="/jobs">

        <x-forms.input label="Title" name="title"/>
        <x-forms.input label="Salary" name="salary"/>
        <x-forms.input label="Location" name="location"/>

        <x-forms.input label="Url" name="url"/>
        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="video, education, study" />

        <x-forms.select label="Schedule" name="schedule">
            <option>Part time</option>
            <option>Full time</option>
        </x-forms.select>

        <x-forms.divider />
        <x-forms.checkbox label="Featured (Costs Extra)" name="featured"/>

        <x-forms.button class="bg-blue-600">Create Job</x-forms.button>

    </x-forms.form>
</x-layout>