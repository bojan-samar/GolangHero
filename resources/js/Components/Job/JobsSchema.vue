<script setup>
import {onMounted, reactive, ref} from "vue";
import {Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from "@tiptap/starter-kit";

const props = defineProps({
    jobs: Object,
});

const state = reactive({
    'editor': null,
})


onMounted(() => {
    state.editor = new Editor({
        editable: false,
        extensions: [
            StarterKit,
        ],
    })

    let jobsSchema = [];


    props.jobs.data.forEach(job => {
        let description;
        try {
            description = JSON.parse(job.description);
        } catch (error) {
            description = null;
        }

        state.editor.commands.setContent(description)

        jobsSchema.push(
            {
                "@context": "https://schema.org",
                "@type": "JobPosting",
                "datePosted": `${job.created_at}`,
                "description": `${state.editor.getHTML()}`,
                "baseSalary": {
                    "@type": "MonetaryAmount",
                    "currency": "USD",
                    "value": {
                        "@type": "QuantitativeValue",
                        "minValue": job.salary_min,
                        "maxValue": job.salary_max,
                        "unitText": "YEAR"
                    }
                },
                "employmentType": "Full-time",
                "industry": "Startups",
                "jobLocationType": "TELECOMMUTE",
                "applicantLocationRequirements": {
                    "@type": "Country",
                    "name": "Anywhere"
                },
                "jobLocation": {
                    "address": {
                        "@type": "PostalAddress",
                        "addressCountry": "USA",
                        "addressLocality": "Anywhere",
                        "addressRegion": "",
                        "streetAddress": "",
                        "postalCode": ""
                    }
                },
                "title": `${job.title}`,
                "image": "",
                "occupationalCategory": "",
                "workHours": "Flexible",
                "validThrough": `${job.expired_at}`,
                "hiringOrganization": {
                    "@type": "Organization",
                    "name": `${job.company.name}`,
                    "logo": ""
                }
            }
        )
    });

    let jobSchemaScript = document.createElement('script');
    jobSchemaScript.setAttribute('type', 'application/ld+json');
    jobSchemaScript.textContent = JSON.stringify(jobsSchema);
    document.getElementById('jobs-schema').append(jobSchemaScript);
});


</script>

<template>
    <section id="jobs-schema"></section>
</template>
