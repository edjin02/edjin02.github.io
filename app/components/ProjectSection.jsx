"use client"
import React, { useState, useRef } from 'react'
import ProjectCard from './ProjectCard'
import ProjectTag from './ProjectTag'
import { motion, useInView } from "framer-motion";




const projectsData = [
    {
        id: 1,
        title: "Dila Elementary School Student Information System",
        description: " DES-OSIS is like a digital hub for managing everything related to students at Dila Elementary School. It streamlines the process of collecting student information, placing them in the correct grades and sections, and ensuring that each grade is overseen by the appropriate teacher.",
        image: "/images/projects/desosis.png",
        tag: ["All", "Web"],
        gitUrl: "/",
        previewUrl: "/",
    },
    {
        id: 2,
        title: "City Urban Department Housing Office",
        description: "A specialized system designed to collect information on all families that have received housing assistance from the government, aiming to comprehensively gather and organize data about households benefiting from government-sponsored housing initiatives.",
        image: "/images/projects/cudho.png",
        tag: ["All"],
        gitUrl: "/",
        previewUrl: "/",
    },
    {
        id: 3,
        title: "Weekender Hot Spring Resort",
        description: " Weekender Hot Spring Resort's website serves as a comprehensive online platform that not only showcases the resort's offerings but also provides a convenient and efficient way for customers to book their stay. Can be access through https://weekenderhotspringresort.github.io",
        image: "/images/projects/weekender.png",
        tag: ["All", "Web"],
        gitUrl: "/",
        previewUrl: "/",
    },
]


const ProjectSection = () => {
    const [tag, setTag] = useState("All");
    const ref = useRef(null);
    const isInView = useInView(ref, { once: true });

    const handleTagChange = (newTag) => {
        setTag(newTag);
    };

    const cardVariants = {
        initial : { y: 50, opacity: 0},
        animate : { y: 0, opacity: 1},
    };

    const filteredProjects = projectsData.filter((project) => 
        project.tag.includes(tag)
    );

  return (
    <section>
    <h2 className='text-center text-4xl font-bold text-white mt-4 mb-4'>
        My Projects
    </h2>
    <div className='text-white flex flex-row justify-center items-center gap-2 py-6'>
        <ProjectTag
         onClick={handleTagChange} 
         name="All" 
         isSelected={tag === "All"} 
         />
         <ProjectTag
         onClick={handleTagChange} 
         name="Web" 
         isSelected={tag === "Web"} 
         />
         {/* add according to preference */}
    </div>
    <ul ref={ref} className='grid md:grid-cols-3 gap-8 md:gap-12'>
        {filteredProjects.map((project, index) => (
            //transition project view to full view
        <motion.li 
        key = {index}
        variants={cardVariants} 
        initial = "initial" 
        animate = {isInView ? "animate" : "initial"}
        transition={{ duration: 0.3, delay : index * 0.4 }}
        >

        <ProjectCard 
            key={project.id} 
            title={project.title} 
            description={project.description} 
            imgUrl={project.image}
            tags={project}
            gitUrl={project.gitUrl}
            previewUrl={project.previewUrl}
        />
        </motion.li>
        ))}
        </ul>
    </section>
    
  )
}

export default ProjectSection