<?php

declare(strict_types=1);

/*
 * This file is part of the zenstruck/foundry package.
 *
 * (c) Kevin Bond <kevinbond@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zenstruck\Foundry\Tests\Fixture\Entity\EdgeCases\RichDomainMandatoryRelationship;

use Doctrine\ORM\Mapping as ORM;
use Zenstruck\Foundry\Tests\Fixture\Model\Base;

#[ORM\MappedSuperclass]
#[ORM\Table(name: 'rich_domain_mandatory_relationship_owning_side_entity')]
abstract class OwningSideEntity extends Base
{
    public function __construct(
        protected InversedSideEntity $main,
    ) {
        $main->addRelation($this);
    }

    public function getMain(): InversedSideEntity
    {
        return $this->main;
    }
}
