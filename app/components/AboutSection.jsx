"use client"
import React, {useTransition, useState} from 'react'
import Image from "next/image"
import TabButton from './TabButton'

const TAB_DATA = [
  {
    title: "Skills",
    id: "skills",
    content: (
      <ul className='list-disc pl-2'>
        <li>PHP</li>
        <li>Python</li>
        <li>JavaScript</li>
        <li>MySQL | Firebase</li>
        <li>Angular</li>
        <li>C++</li>
        <li>Vb.Net</li>
        <li>Photoshop</li>
        <li>Adobe Premiere</li>
      </ul>
    )
  },
  {
    title: "Education",
    id: "education",
    content: (
      <ul className='list-disc pl-2'>
        <li>Polytechnic University of the Philippines, Santa Rosa City</li>
      </ul>
    )
  },
  {
    title: "Experience",
    id: "experience",
    content: (
      <ul className='list-disc pl-2'>
        <li>Web Developer Intern</li>
        <li>MLBB Tournament Committee</li>
      </ul>
    )
  }
]

const AboutSection = () => {
  const [tab, setTab] = useState("skills");
  const [ isPending, startTransition ] = useTransition();

  const handleTabChange = (id) => {
    startTransition(() => {
      setTab(id);
    });
  };

  return  (
    <section className='text-white'>
  <div className="md:grid md:grid-cols-2 gap-8 items-center py-8 px-4 xl:gap-16 sm:py-16 xl:px-16 relative">
    <div className="relative">
      {/* <div className='bg-gradient-to-r from-purple-800 to-blue-800 overflow-hidden h-full w-full z-0 blur-lg absolute top-0 left-0 transform -translate-x-1 -translate-y-1'></div> */}
      <Image
        src="/images/myprofile.png"
        width={500}
        height={500}
        className="overflow-hidden" // Ensure the image has a higher z-index relative z-10
      />
    </div>
    <div className='mt-4 md:mt-0 text-left flex flex-col h-full'>
      <h2 className='text-4xl font-bold text-white mb-4'>About Me</h2>
      <p className='text-base lg:text-lg'>
        A recent graduate with a Bachelor of Science in Information
        Technology, I am eager to kickstart my career in the technology
        industry. I bring a strong foundation in IT concepts, system
        administration, and a passion for emerging technologies. My goal is to
        leverage my knowledge and technical skills to contribute to an
        innovative IT team, gain hands-on experience, and work collaboratively
        to solve real-world challenges. I am excited to learn, adapt, and grow
        within a dynamic and evolving field
      </p>
      <div className='flex flex-row justify-start mt-8'>  
        <TabButton 
          selectTab={() => handleTabChange("skills")} 
          active={tab === "skills"}
        >
          {" "}
          Skills{" "}
        </TabButton>
        <TabButton 
          selectTab={() => handleTabChange("education")} 
          active={tab === "education"}
        >
          {" "}
          Education{" "}
        </TabButton>
        <TabButton 
          selectTab={() => handleTabChange("experience")} 
          active={tab === "experience"}
        >
          {" "}
          Experience{" "}
        </TabButton>
        {/* add more depending on preference  */}
      </div>
      <div className='mt-8'>
        {TAB_DATA.find((t) => t.id === tab).content}
      </div>
    </div>
  </div>
</section>

  
  )
}

export default AboutSection