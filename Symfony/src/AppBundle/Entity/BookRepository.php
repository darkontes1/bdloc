<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BookRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BookRepository extends EntityRepository
{
    public function allResults()
    {
        $qb=$this->createQueryBuilder('b');
        $qb->select('b','a','c','s')
        ->leftJoin('b.dessinateur', 'a')
        ->leftJoin('b.scenariste', 'c')
        ->leftJoin('b.coloriste', 's');
        $query=$qb->getQuery();
        $query->setMaxResults(10);
        $result=$query->getResult();

        return $result;
    }

    public function findPaginated($page, $cate, $exem, $mc)
    {
       
        //Doctrine Query Builder
        $qb = $this->createQueryBuilder("b");

        $qb->select('b','a','c','s','se')
        ->leftJoin('b.dessinateur', 'a')
        ->leftJoin('b.scenariste', 'c')
        ->leftJoin('b.coloriste', 's')
        ->leftJoin('b.serie','se');

        if(!empty($cate)){
            $qb->andwhere('se.style = :cate');
            $qb->setParameter("cate",$cate);
        }

        if(!empty($exem)){
            $qb->andwhere('b.exemplaires = :exem');
            $qb->setParameter("exem",$exem);
        }

        if(!empty($mc)){
            $qb->andwhere('b.title = :mc')
                ->orwhere('b.dessinateur = :mc');
            $qb->setParameter("mc",$mc);
        }

        //commun aux deux
        $query = $qb->getQuery();

        $numPerPage = 10;
        $query->setMaxResults($numPerPage);
        $query->setFirstResult( ($page-1) * $numPerPage );
        $result = $query->getResult();

        $paginationResults = array();

        //nombre total possible
        $paginationResults["total"] = $qb->select("COUNT(b)")->getQuery()->getSingleScalarResult();
        $lastPage = ceil($paginationResults["total"] / $numPerPage);

        if ($page > $lastPage){
            return false;
        }

        //les actualités
        $paginationResults["data"] = $result;

        //affichage des infos sur les résultats
        $paginationResults['nowShowingMin'] = ($page-1) * $numPerPage + 1;
        $paginationResults['nowShowingMax'] = $paginationResults['nowShowingMin'] + count($result) - 1;

        //liens numériques
        $numPagesDiff = 2;
        $paginationResults['numLinkMin'] = ($page - $numPagesDiff < 1) ? 1 : $page - $numPagesDiff;
        $paginationResults['numLinkMax'] = ($page + $numPagesDiff >= $lastPage) ? $lastPage : $page + $numPagesDiff;

        //page précédente ?
        $paginationResults["prevPage"] = ($page <= 1) ? false : $page-1;
        $paginationResults["nextPage"] = ($page >= $lastPage) ? false : $page+1;
        
        //dump($paginationResults);
        return $paginationResults;
    }
}
