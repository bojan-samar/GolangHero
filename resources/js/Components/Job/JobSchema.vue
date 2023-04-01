<script setup>
import {onMounted, ref} from "vue";

const props = defineProps({
    job: Object,
});

const jobSchemaSectionID = ref(Math.floor(Math.random() * 10000000));

onMounted(() => {
    let jobSchema = {
        "@context": "https://schema.org",
        "@type": "JobPosting",
        "datePosted": `${props.job.created_at}`,
        "description": `${props.job.stripped_description}`,
        "baseSalary": {
            "@type": "MonetaryAmount",
            "currency": "USD",
            "value": {
                "@type": "QuantitativeValue",
                "minValue": props.job.salary_min,
                "maxValue": props.job.salary_max,
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
        "title": `${props.job.title}`,
        "image": "",
        "occupationalCategory": "",
        "workHours": "Flexible",
        "validThrough": `${props.job.expired_at}`,
        "hiringOrganization": {
            "@type": "Organization",
            "name": `${props.job.company.name}`,
            "logo": ""
        }
    }


    let jobSchemaScript = document.createElement('script');
    jobSchemaScript.setAttribute('type', 'application/ld+json');
    jobSchemaScript.textContent = JSON.stringify(jobSchema);
    document.getElementById(jobSchemaSectionID.value).append(jobSchemaScript);
});


</script>

<template>
    <section :id="jobSchemaSectionID"></section>
</template>
